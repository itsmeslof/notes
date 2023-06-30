import Divider from "@/Components/Divider";
import MaxWidthContainer from "@/Components/MaxWidthContainer";
import StandardLink from "@/Components/StandardLink";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import QuickLinks from "@/Components/Dashboard/QuickLinks";
import RecentNotes from "@/Components/Dashboard/RecentNotes";
import Resources from "@/Components/Dashboard/Resources";
import Heading from "@/Components/Heading";

export default function Dashboard({ auth, recentNotes }) {
    return (
        <AuthenticatedLayout>
            <Head title="Dashboard" />

            <MaxWidthContainer classes="py-12 space-y-10">
                <section className="flex items-center justify-between">
                    <Heading
                        level="h1"
                        text={`Welcome back, ${auth.user?.name}`}
                    />
                    <StandardLink>Account Settings</StandardLink>
                </section>

                <Divider></Divider>

                <section className="flex flex-col lg:flex-row lg:space-x-4 space-y-10 lg:space-y-0">
                    <QuickLinks className="w-2/5" />
                    <Divider className="lg:hidden" />
                    <RecentNotes notes={recentNotes} />
                </section>
                <Divider />
                <section>
                    <Resources />
                </section>
            </MaxWidthContainer>
        </AuthenticatedLayout>
    );
}
